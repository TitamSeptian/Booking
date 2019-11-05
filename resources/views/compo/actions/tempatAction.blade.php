<a class="btn-show mr-3" title="{{ $model->name }}" href="{{$urlShow}}">
	<i class="fas fa-eye text-inverse"></i>
</a>
<a class="btn-edit mr-3" title="{{ $model->name }}" href="{{$urlEdit}}">
	<i class="fas fa-pen text-success"></i>
</a>
<a class="btn-delete" title="{{ $model->name }}" href="{{ $urlDelete }}">
	<i class="fas fa-trash text-danger"></i>
</a>