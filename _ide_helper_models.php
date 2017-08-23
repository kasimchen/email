<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\Email
 *
 * @property int $id
 * @property int $e_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property string|null $date
 * @property string|null $subject
 * @property string|null $fromName
 * @property string|null $fromAddress
 * @property string|null $to
 * @property string|null $cc
 * @property string|null $replyTo
 * @property string|null $textPlain
 * @property string|null $textHtml
 * @property string|null $attachment
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereCc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereEId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereFromAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereReplyTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereTextHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereTextPlain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Email whereUserId($value)
 */
	class Email extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Permission[] $perms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $company_email
 * @property string|null $company_password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCompanyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCompanyPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Version
 *
 * @property int $id
 * @property string $content
 * @property string|null $db_content
 * @property string|null $env_content
 * @property int|null $e_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $user_id
 * @property string|null $deleted_at
 * @property string $title
 * @property string $project
 * @property string|null $app
 * @property-read \App\Model\User $author
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Version onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereDbContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereEId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereEnvContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Version withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Version withoutTrashed()
 */
	class Version extends \Eloquent {}
}

