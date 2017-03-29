@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Store Class
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($storeClass, ['route' => ['storeClasses.update', $storeClass->id], 'method' => 'patch']) !!}

                        @include('store_classes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection