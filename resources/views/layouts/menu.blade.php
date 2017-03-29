<li class="{{ Request::is('storeLevels*') ? 'active' : '' }}">
    <a href="{!! route('storeLevels.index') !!}"><i class="fa fa-edit"></i><span>StoreLevels</span></a>
</li>
<li class="{{ Request::is('storeClasses*') ? 'active' : '' }}">
    <a href="{!! route('storeClasses.index') !!}"><i class="fa fa-edit"></i><span>StoreClasses</span></a>
</li>

