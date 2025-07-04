<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use ReflectionException;
use Saham\SharedLibs\Helpers\PermissionHelpers;
use Saham\SharedLibs\Models\Abstracts\PermissionContract;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use Saham\SharedLibs\Registerer\PermissionRegistrar;
use Saham\SharedLibs\Traits\HasRoles;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Traits\RefreshesPermissionCache;

use function app;

/**
 * Class Permission.
 *
 * @property string $_id
 * @property mixed $id 253 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 253 occurrences
 * @property string|null $group_name 151 occurrences
 * @property string|null $guard_name 253 occurrences
 * @property string|null $name 253 occurrences
 * @property string|null $title_ar 151 occurrences
 * @property string|null $title_en 151 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 253 occurrences
 * @property-read \Illuminate\Support\Collection<string> $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Role> $roles
 * @property-read mixed|null $users
 * @property-read int|null $roles_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission permission($permissions)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission role($roles)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereGroupName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereGuardName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends Eloquent implements PermissionContract
{
    use HasRoles;
    use RefreshesPermissionCache;

    public $guarded = ['id'];
    protected $fillable = [
        'name', 'title_ar', 'title_en', 'group_name' , 'guard_name',
    ];
    protected PermissionHelpers $helpers;

    /**
     * Permission constructor.
     *
     * @param array $attributes
     *
     * @throws ReflectionException
     */
    public function __construct(array $attributes = [])
    {
        $attributes['guard_name'] ??= 'admin';

        parent::__construct($attributes);

        $this->helpers = new PermissionHelpers();

        $this->setTable(config('permission.collection_names.permissions'));
    }

    /**
     * Create new Permission.
     *
     * @param array $attributes
     *
     * @return $this|Model
     *
     * @throws PermissionAlreadyExists
     * @throws ReflectionException
     */
    public static function create(array $attributes = []): Model|static
    {
        $helpers                  = new PermissionHelpers();
        $attributes['guard_name'] ??= 'admin';

        if (
            static::getPermissions()->where('name', $attributes['name'])->where(
                'guard_name',
                $attributes['guard_name']
            )->first()
        ) {
            $name      = (string) $attributes['name'];
            $guardName = (string) $attributes['guard_name'];
            $guardName = (string) $attributes['guard_name'];

            throw new PermissionAlreadyExists($helpers->getPermissionAlreadyExistsMessage($name, $guardName));
        }

        return static::query()->create($attributes);
    }

    /**
     * Find or create permission by its name (and optionally guardName).
     *
     * @param string      $name
     * @param string|null $guardName
     *
     * @throws ReflectionException
     */
    public static function findOrCreate(string $name, ?string $guardName = null): object
    {
        $guardName ??= 'admin';
        $permission = static::getPermissions()->filter(static function ($permission) use ($name, $guardName) {
            return $permission->name === $name && $permission->guard_name === $guardName;
        })->first();

        if (!$permission) {
            $permission = static::create(['name' => $name, 'guard_name' => $guardName]);
        }

        return $permission;
    }

    /**
     * A permission can be applied to roles.
     */
    public function rolesQuery(): object
    {
        $roleClass = $this->getRoleClass();

        return $roleClass->query()->where('permission_ids', 'all', [$this->_id]);
    }

    /**
     * A permission can be applied to roles.
     */
    public function getRolesAttribute(): mixed
    {
        return $this->rolesQuery()->get();
    }

    /**
     * A permission belongs to some users of the model associated with its guard.
     */
    public function usersQuery(): mixed
    {
        $usersClass = app($this->helpers->getModelForGuard($this->attributes['guard_name']));

        return $usersClass->query()->where('permission_ids', 'all', [$this->_id]);
    }

    /**
     * A permission belongs to some users of the model associated with its guard.
     */
    public function getUsersAttribute(): mixed
    {
        return $this->usersQuery()->get();
    }

    /**
     * Get the current cached permissions.
     *
     * @return Collection<Permission>
     */
    protected static function getPermissions(): Collection
    {
        return app(PermissionRegistrar::class)->getPermissions();
    }

    /**
     * Get the class name of the role model.
     *
     * @return string
     */
    public static function findById(int $id, $guardName): ?self
    {
        $guardName ??= 'admin';

        $permission = static::getPermissions()->filter(static function ($permission) use ($id, $guardName) {
            return $permission->_id === $id && $permission->guard_name === $guardName;
        })->first();

        if (!$permission) {
            $helpers = new PermissionHelpers();
            staging_error($helpers->getPermissionDoesNotExistMessage($id, $guardName));
        }

        return $permission;
    }

    public static function findByName(string $name, $guardName): ?self
    {
        $guardName =  'admin';

        $permission = static::getPermissions()->filter(static function ($permission) use ($name, $guardName) {
            return $permission->name === $name && $permission->guard_name === $guardName;
        })->first();

        if (!$permission) {
            $helpers = new PermissionHelpers();

            staging_error($helpers->getPermissionDoesNotExistMessage($name, $guardName));
        }

        return $permission;
    }
}
