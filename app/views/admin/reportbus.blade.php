@extends('admin.template.default')

@section('content')
<div class="span3">

        <div class="todo mrm">
           
            <ul>
              <li>
                
                <div class="todo-content">
                  <h4 class="todo-name">
                   <a href="{{URL::to('admin/page')}}" ><strong>View</strong> BUS</a>
                   
                  </h4>                 
                </div>
              </li>

              <li>
              
                <div class="todo-content">
                  <h4 class="todo-name">
                   <a href="{{URL::to('admin/addbus')}}" ><strong>ADD</strong> BUS</a>
                  </h4>
                
                </div>
              </li>

              <li class="todo-done">
               
                <div class="todo-content">
                  <h4 class="todo-name">
                   <a href="{{URL::to('admin/addgenreport')}}" ><strong>BUS REPORT</strong> </a>
                  </h4>
                 
                </div>
              </li>

              
            </ul>
          </div>
</div>
@stop