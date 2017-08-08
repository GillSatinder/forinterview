@extends('layouts.master')


@section('content')

@include('includes.message-block')

            <section class="row new-posts">
                <div class= "col-md-6 col-md-offset-3">
                   <header>
                       <h3>What do you have to say?</h3>
                   </header>
                   <form action="{{ route('post.create')  }}" method="post">
                       {{csrf_field()}}
                       <div class="form-group">
                           <textarea class="form-control" name="body" id="body" rows="5" placeholder="Your Post"></textarea>
                       </div>
                       <button type="submit" class="btn btn-primary">Create Post</button>
                   </form>
               </div>
            </section>

            <section class="row posts">
                <div class="col-md-6 col-md-offset-3">
                    <header><h3>What other people say . . .</h3></header>

                    @foreach($posts as $post)




                <article class="post">
                <p>
                    {{$post->body}}
                </p>
                    <div class="info">
                        Posted by {{$post->user->first_name}} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a>

                        @if(Auth::user() == $post->user)
                            |


                            <a href="#">Edit</a>﻿
                        {{--<a href="#">Edit</a>--}}
                        |
                        <a href="{{ route('post.delete' , ['id' => $post->id]) }}">Delete</a>
                            @endif
                    </div>
                </article>
                    @endforeach
                </div>
            </section>

<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="post-body">Edit the Post</label>
                        <textarea class="form-control" name="post-body" rows="5"></textarea>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@endsection