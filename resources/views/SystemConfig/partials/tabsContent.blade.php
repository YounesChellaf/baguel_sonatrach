<div class="tab-content tabs-left-content card-block" style="width: 100%;">
  @switch($page)
    @case('exitPermission')
      @include('SystemConfig.partials.tabsContent.exitPermission')
    @break

    @case('lifebase')
      @include('SystemConfig.partials.tabsContent.lifebase')
    @break

    @case('administrations')
      @include('SystemConfig.partials.tabsContent.administrations')
    @break

    @default
      @abort(404)
@endswitch
</div>
