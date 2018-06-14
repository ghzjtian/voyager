<?php $page = TCG\Voyager\Models\Page::first();?>

@can('browse',$page)
    You can browse pages
@endcan
