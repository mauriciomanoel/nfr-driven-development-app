@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">

                @if(Session::has('message'))
                    <div class="row">
                        <div class="col-12">
                          <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                          </div>

                        </div>
                    </div>
                @endif  
                
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Taxonomy') }}
                    </div>
                    <div class="card-body" id="card-body"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

<style>
    /* Add the provided CSS styles here */
    .node {
        cursor: pointer;
    }

    .node circle {
        fill: #fff;
        stroke: steelblue;
        stroke-width: 3px;
    }

    .node text {
        font: 12px sans-serif;
    }

    .link {
        fill: none;
        stroke: #ccc;
        stroke-width: 2px;
    }

</style>
    
@section('javascript')



<script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>

@php
echo '<script>
    var treeData = JSON.parse(\'' . $data . '\');
    var urlMap = JSON.parse(\'' . $urlMap . '\');
</script>';
@endphp

<script src="{{ asset('js/collapsible-tree.js?v=4') }}"></script>

@endsection

