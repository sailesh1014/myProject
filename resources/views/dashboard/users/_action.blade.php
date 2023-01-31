<?php
$attributes = (array)$r->resource;
?>
<a href="{{ route('users.show', $r->id) }}" class="btn btn-sm btn-icon btn-light-facebook" title="{{ __('Show') }}"><i
        class="fas fa-eye"></i></a>
@can('update', new \App\Models\User($attributes))
<a href="{{ route('users.edit', $r->id) }}" class="btn btn-icon btn-light-primary btn-sm ml-1p"
   title="{{ __('Update') }}"><i class="fas fa-pencil-alt"></i></a>
@endcan
@can('delete', new \App\Models\User($attributes))
<button class="btn btn-icon btn-light-youtube btn-sm ml-1p"
        onclick="confirmDelete(() => {deleteUser({{$r->id}})})"
        title="{{ __('Destroy') }}"><i class="fas fa-trash"></i></button>
@endCan()


