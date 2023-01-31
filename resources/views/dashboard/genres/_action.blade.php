@can('view',\App\Models\Genre::class)
    <a href="{{ route('genres.show', $r->id) }}" class="btn btn-sm btn-icon btn-light-facebook" title="{{ __('Show') }}"><i
        class="fas fa-eye"></i></a>
@endcan
@can('update',\App\Models\Genre::class)
<a href="{{ route('genres.edit', $r->id) }}" class="btn btn-icon btn-light-primary btn-sm ml-1p"
   title="{{ __('Update') }}"><i class="fas fa-pencil-alt"></i></a>
@endcan
@can('delete',\App\Models\Genre::class)
<button class="btn btn-icon btn-light-youtube btn-sm ml-1p"
        onclick="confirmDelete(() => {deleteGenre({{$r->id}})})"
        title="{{ __('Destroy') }}"><i class="fas fa-trash"></i></button>
@endcan
