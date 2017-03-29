@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Store Level
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($storeLevel, ['route' => ['storeLevels.update', $storeLevel->id], 'method' => 'patch']) !!}

                        @include('store_levels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection