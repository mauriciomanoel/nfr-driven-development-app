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
                      <i class="fa fa-align-justify"></i>{{ __('Taxonomy') }}</div>
                    <div class="card-body">
                    <div id="observablehq-chart-221d9a14"></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

<script type="module">
  
  import {Runtime, Inspector} from "https://cdn.jsdelivr.net/npm/@observablehq/runtime@4/dist/runtime.js";
  import define from "https://www.rs4aal.site/js/collapsible-tree.js?v=4";

  new Runtime().module(define, name => {
    if (name === "chart") return new Inspector(document.querySelector("#observablehq-chart-221d9a14"));
  });

</script>

@endsection

