<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Group;
use App\Models\Music;

Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Trang chủ', route('admin.index'));
});
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Người Dùng', route('admin.users.index'));
});
Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.users.index');
    $trail->push('Thêm Người Dùng', route('admin.users.create'));
});
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('admin.users.index');
    $trail->push('Cập Nhật Người Dùng', route('admin.users.edit', $user));
});
Breadcrumbs::for('admin.users.show', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('admin.users.index');
    $trail->push('Chi Tiết Người Dùng', route('admin.users.show', $user));
});
// Role
Breadcrumbs::for('admin.roles.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Roles', route('admin.roles.index'));
});
Breadcrumbs::for('admin.roles.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.roles.index');

    $trail->push('Add new role', route('admin.roles.create'));
});
Breadcrumbs::for('admin.roles.edit', function (BreadcrumbTrail $trail, Role $post): void {
    $trail->parent('admin.roles.index');

    $trail->push($post->name, route('admin.roles.edit', $post));
});
// post
Breadcrumbs::for('admin.posts.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Bài Viết', route('admin.posts.index'));
});
// categories
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Phân Loại', route('admin.categories.index'));
});
// tag
Breadcrumbs::for('admin.tags.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Gắn thẻ', route('admin.tags.index'));
});
// music
Breadcrumbs::for('admin.musics.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Bản Nhạc', route('admin.musics.index'));
});
Breadcrumbs::for('admin.musics.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.musics.index');
    $trail->push('Tải bài nhạc', route('admin.musics.create'));
});
Breadcrumbs::for('admin.musics.show', function (BreadcrumbTrail $trail, Music $music): void {
    $trail->parent('admin.musics.index');
    $trail->push($music->song_name, route('admin.musics.show', $music));
});
Breadcrumbs::for('admin.musics.edit', function (BreadcrumbTrail $trail, Music $music): void {
    $trail->parent('admin.musics.index');
    $trail->push($music->song_name, route('admin.musics.edit', $music));
});
// Group
Breadcrumbs::for('admin.groups.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Đội Nhóm', route('admin.groups.index'));
});
Breadcrumbs::for('admin.groups.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.groups.index');
    $trail->push('Tạo Nhóm', route('admin.groups.create'));
});
Breadcrumbs::for('admin.groups.edit', function (BreadcrumbTrail $trail, Group $group): void {
    $trail->parent('admin.groups.index');
    $trail->push($group->name, route('admin.groups.edit', $group));
});
Breadcrumbs::for('admin.groups.show', function (BreadcrumbTrail $trail, Group $group): void {
    $trail->parent('admin.groups.index');
    $trail->push($group->name, route('admin.groups.show', $group));
});
// Permission
Breadcrumbs::for('admin.permissions.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Permissions', route('admin.permissions.index'));
});
Breadcrumbs::for('admin.permissions.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.permissions.index');

    $trail->push('Add new permission', route('admin.permissions.create'));
});
Breadcrumbs::for('admin.permissions.edit', function (BreadcrumbTrail $trail, Permission $post): void {
    $trail->parent('admin.permissions.index');

    $trail->push($post->name, route('admin.permissions.edit', $post));
});
// profile
Breadcrumbs::for('admin.profile.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Profile', route('admin.profile.index'));
});
// change password
Breadcrumbs::for('admin.password.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Change Password', route('admin.password.index'));
});
