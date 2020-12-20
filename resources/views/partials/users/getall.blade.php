
<div class="row">
        
      @foreach ($users as $user)
        
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{$user->name}}</h3>
              <h5 class="widget-user-desc">{{$user->occupation}}</h5>
            </div>
            <div class="widget-user-image">
            @if (!empty($user->avatar))
              <img class="img-circle" src="{{$user->avatar}}" alt="User Avatar" onerror=this.src="{{ asset('/assets/dist/img/assets_dist_img_user1-128x128.jpg') }}">
              @else
                  <span class="i-circle">@if (!empty($user->name[0])){{$user->name[0]}}@endif  </span>
              @endif  
            </div>
          
            <div class="box-footer">
              <div class="row">
                <!-----chart -->
            <div class="box-body text-center">
                    <div class="inlinesparkline" data-type="bar" data-width="97%" data-height="100px" data-bar-Width="14" data-bar-Spacing="7" data-bar-Color="#f39c12">
                     {{$user->revenue}}
                    </div>  
                    <div>Conversions {{date('d/m', strtotime($user->minTime))}} - {{date('d/m', strtotime($user->maxTime))}}</div>
              </div>
            
              <!-----/chart -->


                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{$user->totalImpressions}}</h5>
                    <span class="description-text">Impressions</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{number_format($user->totalConversions, 2)}}</h5>
                    <span class="description-text">conversions</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">{{number_format($user->totalConversions + $user->totalImpressions, 2)}}</h5>
                    <span class="description-text">revenue</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
          <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
      @endforeach
      </div>

     <Script>
      $('.inlinesparkline').sparkline('html', {type: 'line', height: '3.5em', width: '20em'}); 
     </script> 