<div class="row my-5">
    {{ with(new App\Pagination\CustomPresenter($posts))->render() }}
</div>
