@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Create Project') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Description..') }}" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Life Settings</label>
                                <select class="form-control" id="life_settings" name="life_settings" required>
                                   <option value="">Select a Life Setting</option>
                                    @foreach($lifeSettings as $lifeSetting)
                                        <option value="{{ $lifeSetting->id }}">{{ $lifeSetting->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" id="life_settings_category" name="life_settings_category" required>
                                   <option value="">Select a Life Setting Category</option>                                   
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" id="life_settings_subcategory" name="life_settings_subcategory" required>
                                   <option value="">Select a Life Setting Subcategory</option>
                                </select>
                            </div>

                            <div class="col-12">
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="list-" role="tabpanel"><p></p></div>
                                @foreach($lifeSettings as $lifeSetting)
                                    <div class="tab-pane fade" id="list-{{ $lifeSetting->id }}" role="tabpanel">
                                      <p>{{ $lifeSetting->description }}</p>
                                    </div>
                                @endforeach
                              </div>
                            </div>
 
                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('projects.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

<script> 

  var lifeSettingsCategories = <?php echo json_encode($lifeSettingsCategories); ?>;
  var lifeSettingsSubcategories = <?php echo json_encode($lifeSettingsSubcategories); ?>;

  $('#life_settings').on('change', function(e) {
      var id = $(this).val();      
      $(".tab-pane").removeClass("active show");
      $('#list-' + id).addClass(" active show");
  });

  $(document).ready(function() {
      $("#life_settings").change(function() {
          var val = $(this).val();
          var htmlValue = "<option value=\"\">Select a Life Setting Category</option>";
          var data_filter = lifeSettingsCategories.filter( element => element.life_settings_id == val)
          data_filter.forEach(
            item => htmlValue += "<option value=" + item.id + ">"+ item.name +"</option>"
          );
          $("#life_settings_category").html(htmlValue);
      });

      $("#life_settings_category").change(function() {
          var val = $(this).val();
          var htmlValue = "<option value=\"\">Select a Life Setting Subcategory</option>";
          var data_filter = lifeSettingsSubcategories.filter( element => element.life_settings_categories_id == val)
          data_filter.forEach(
            item => htmlValue += "<option value=" + item.id + ">"+ item.name +"</option>"
          );
          $("#life_settings_subcategory").html(htmlValue);
      });
  });
</script>

@endsection