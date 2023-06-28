@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $project->title }}</div>
                    <div class="card-body">
                        <form method="POST" action="/projects/{{ $project->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" value="{{ $project->title }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label>Description</label>
                                    <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Content..') }}" required>{{ $project->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label>Life Settings</label>
                                    <select class="form-control" name="life_settings_id" disabled>
                                        @foreach($lifeSettings as $lifeSetting)
                                            @if( $lifeSetting->id == $project->life_settings_id )
                                                <option value="{{ $lifeSetting->id }}" selected="true">{{ $lifeSetting->name }}</option>
                                            @else
                                                <option value="{{ $lifeSetting->id }}">{{ $lifeSetting->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" id="life_settings_category" name="life_settings_category" required>
                                        <?php 
                                            $filtered = $lifeSettingsCategories->filter(function ($value, $key) use ($project) {
                                                return $value['life_settings_id'] == $project->life_settings_id; 
                                            });
                                        ?>
                                        @foreach($filtered as $lifeSettingsCategory)
                                            @if( $lifeSettingsCategory->id == $project->life_settings_category_id )
                                                <option value="{{ $lifeSettingsCategory->id }}" selected="true">{{ $lifeSettingsCategory->name }}</option>
                                            @else
                                                <option value="{{ $lifeSettingsCategory->id }}">{{ $lifeSettingsCategory->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <label>Subcategory</label>
                                    <select class="form-control" id="life_settings_subcategory" name="life_settings_subcategory" required>
                                        <?php 
                                            $filtered = $lifeSettingsSubcategories->filter(function ($value, $key) use ($project) {
                                                return $value['life_settings_categories_id'] == $project->life_settings_category_id; 
                                            });

                                        ?>
                                        @foreach($filtered as $lifeSettingsSubcategory)
                                            @if( $lifeSettingsSubcategory->id == $project->life_settings_subcategory_id )
                                                <option value="{{ $lifeSettingsSubcategory->id }}" selected="true">{{ $lifeSettingsSubcategory->name }}</option>
                                            @else
                                                <option value="{{ $lifeSettingsSubcategory->id }}">{{ $lifeSettingsSubcategory->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="col">
                                    <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                    <a href="{{ route('projects.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                                </div>
                            </div>
 
                            
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

  $(document).ready(function() {
      $("#life_settings").change(function() {
          var val = $(this).val();
          var htmlValue = "";
          var data_filter = lifeSettingsCategories.filter( element => element.life_settings_id == val)
          data_filter.forEach(
            item => htmlValue += "<option value=" + item.id + ">"+ item.name +"</option>"
          );
          $("#life_settings_category").html(htmlValue);
      });

      $("#life_settings_category").change(function() {
          var val = $(this).val();
          var htmlValue = "";
          var data_filter = lifeSettingsSubcategories.filter( element => element.life_settings_categories_id == val)
          data_filter.forEach(
            item => htmlValue += "<option value=" + item.id + ">"+ item.name +"</option>"
          );
          $("#life_settings_subcategory").html(htmlValue);
      });
  });
</script>

@endsection