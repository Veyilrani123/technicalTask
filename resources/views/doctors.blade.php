@extends('layouts.header')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="row">
                @foreach($doctors as $result)
                    <div class="col-4">
                        <div class="listBox">
                            <div class="profileBox">
                                <img src="{{$result->profile_picture}}">
                            </div>
                            <div class="infoBox row col-12 m-0 pt-3">
                                <div class="col-3">
                                    @if(!$result->fav->isEmpty())
                                        @php $favClass = "active"; @endphp
                                    @else
                                        @php $favClass = ""; @endphp
                                    @endif
                                    <span class="fav {{$favClass}}" data-id="{{$result->id}}">
                                        <i class="fa fa-heart"></i>
                                    </span>
                                </div>
                                <div class="details col-9">
                                    <h4>{{$result->name}}</h4>
                                    <p>{{$result->speciality[0]->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    .container-fluid {
        background-color: #fcfcfc;
    }
    span.active {
        color: #b50404;
    }
</style>
<script>
    $('.fav').click(function() {
        var mainParent = $(this);
        var id = mainParent.data('id');
        if($(mainParent).hasClass('active')) {
            $(this).removeClass("active");
            var status = 0;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'/favorite/'+id+'?status='+status,
                type:'POST',
                dataType: 'json',
                contentType: false,
                processData: false,
                success:function(result){
                console.log("unchecked");
                }

            });
        }     
        else{
            $(this).addClass("active");
            var status = 1;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'/favorite/'+id+'?status='+status,
                type:'POST',
                dataType: 'json',
                contentType: false,
                processData: false,
                success:function(result){
                console.log("checked");
                }

            });
        }
    });
</script>
@endsection