<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Saham\SharedLibs\Helpers\PermissionHelpers;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use Saham\SharedLibs\Traits\HasPermissions;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Guard;
// use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\RefreshesPermissionCache;

/**
 * @property mixed                           $id                22 occurrences
 * @property string|null                     $administrator_ids 18 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at        22 occurrences
 * @property string|null                     $guard_name        19 occurrences
 * @property string|null                     $name              22 occurrences
 * @property string|null                     $permission_ids    17 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at        22 occurrences
 * @property Collection<string>|null         $permissions
 * @property mixed|null                      $users
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role permission($permissions)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role whereAdministratorIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role whereGuardName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role whereName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role wherePermissionIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Role extends Eloquent
{
    use HasPermissions;
    use RefreshesPermissionCache;

    public $guarded = ['id'];
    protected PermissionHelpers $helpers;

    protected $fillable = ['name', 'guard_name', 'permission_ids', 'administrator_ids'];

    /**
     * Role constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $attributes['guard_name'] ??= (new Guard())->getDefaultName(static::class);

        parent::__construct($attributes);

        $this->helpers = new PermissionHelpers();

        $this->setTable(config('permission.collection_names.roles'));
    }

    /**
     * @param array $attributes
     *
     * @throws RoleAlreadyExists
     */
    public static function create(array $attributes = []): Model|RoleContract|Builder
    {
        $attributes['guard_name'] ??= (new Guard())->getDefaultName(static::class);
        $helpers                  = new PermissionHelpers();
        $existing                 = static::query()->where('name', $attributes['name'])->where('guard_name', $attributes['guard_name'])->first();

        if ($existing) {
            $name      = (string) $attributes['name'];
            $guardName = (string) $attributes['guard_name'];

            return $existing;

            throw new RoleAlreadyExists($helpers->getRoleAlreadyExistsMessage($name, $guardName));
        }

        return static::query()->create($attributes);
    }

    /**
     * Find or create role by its name (and optionally guardName).
     *
     * @param string      $name
     * @param string|null $guardName
     */
    public static function findOrCreate(string $name, ?string $guardName = null): self
    {
        $guardName ??= (new Guard())->getDefaultName(static::class);

        $role = static::query()
            ->where('name', $name)
            ->where('guard_name', $guardName)
            ->first();

        if (!$role) {
            $role = static::create(['name' => $name, 'guard_name' => $guardName]);
        }

        return $role;
    }

    public static function findById(): void
    {
    }

    /**
     * Find a role by its name and guard name.
     *
     * @param string      $name
     * @param string|null $guardName
     */
    public static function findByName(string $name, ?string $guardName = null): self
    {
        $guardName ??= (new Guard())->getDefaultName(static::class);

        $role = static::query()
            ->where('name', $name)
            ->where('guard_name', $guardName)
            ->first();

        if (!$role) {
            $helpers = new PermissionHelpers();

            throw new RoleDoesNotExist($helpers->getRoleDoesNotExistMessage($name, $guardName));
        }

        return $role;
    }

    /**
     * A permission belongs to some users of the model associated with its guard.
     */
    public function usersQuery(): mixed
    {
        $usersClass = app($this->helpers->getModelForGuard($this->attributes['guard_name']));

        return $usersClass->query()->where('role_ids', 'all', [$this->_id]);
    }

    /**
     * A permission belongs to some users of the model associated with its guard.
     */
    public function getUsersAttribute(): mixed
    {
        return $this->usersQuery()->get();
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param string|Permission $permission
     *
     * @throws GuardDoesNotMatch
     */
    public function hasPermissionTo(string|Permission $permission): bool
    {
        if (is_string($permission)) {
            $permission = $this->getPermissionClass()->findByName($permission, $this->getDefaultGuardName());
        }

        if (!$this->getGuardNames()->contains($permission->guard_name)) {
            $expected = $this->getGuardNames();
            $given    = $permission->guard_name;

            throw new GuardDoesNotMatch($this->helpers->getGuardDoesNotMatchMessage($expected, $given));
        }

        return in_array($permission->_id, $this->permission_ids ?? [], true);
    }
}
