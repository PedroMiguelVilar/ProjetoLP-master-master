<!DOCTYPE html>
<!-- saved from url=(0022)http://127.0.0.1:8000/ -->
@extends('layouts.app')
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <style>
        body {background: #212534;}*{ box-sizing:border-box; -moz-box-sizing:border-box; } #wrap{ width: 90%; max-width: 1100px; margin: 50px auto; } .columns_2 figure{ width:49%; margin-right:1%; } .columns_2 figure:nth-child(2){ margin-right: 0; } .columns_3 figure{ width:32%; margin-right:1%; } .columns_3 figure:nth-child(3){ margin-right: 0; } .columns_4 figure{ width:24%; margin-right:1%; } .columns_4 figure:nth-child(4){ margin-right: 0; } .columns_5 figure{ width:19%; margin-right:1%; } .columns_5 figure:nth-child(5){ margin-right: 0; } #columns figure:hover{ -webkit-transform: scale(1.1); -moz-transform:scale(1.1); transform: scale(1.1); } #columns:hover figure:not(:hover) { opacity: 0.4; } div#columns figure { display: inline-block; background: #FEFEFE; border: 2px solid #FAFAFA; box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4); margin: 0 0px 15px; -webkit-column-break-inside: avoid; -moz-column-break-inside: avoid; column-break-inside: avoid; padding: 15px; padding-bottom: 5px; background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9); opacity: 1; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -o-transition: all .3s ease; transition: all .3s ease; } div#columns figure img { width: 100%; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-bottom: 5px; } div#columns figure figcaption { font-size: .9rem; color: #444; line-height: 1.5; height:60px; font-weight:600; text-overflow:ellipsis; } a.button{ padding:10px; background:salmon; margin:10px; display:block; text-align:center; color:#fff; transition:all 1s linear; text-decoration:none; text-shadow:1px 1px 3px rgba(0,0,0,0.3); border-radius:3px; border-bottom:3px solid #ff6536; box-shadow:1px 1px 3px rgba(0,0,0,0.3); } a.button:hover{ background:#ff6536; border-bottom:3px solid salmon; color:#f1f2f3; } @media screen and (max-width: 960px) { #columns figure { width: 24%; } } @media screen and (max-width: 767px) { #columns figure { width:32%;} } @media screen and (max-width: 600px) { #columns figure { width: 49%;} } @media screen and (max-width: 500px) { #columns figure { width: 100%;} }
        .carousel-fix{ width: 90%; padding: 20px; margin: 100px auto; display: inline; felx-direction: row; justify-content: center; } .box{ height: 200px; width: 227px; margin: 0 10px; box-shadow: 0 0 20px 2px rgba(0,0,0,-1); transition: 1s; } .box img{ display: block; width: 100%; border-radius: 5px; } .box:hover{ transform: scale(1.3); z-index: 2; }
    </style>
    
</head>
<style>* { box-sizing: border-box; } .details-card { width: 80%; margin: auto; } .description-container { position: relative; /* height: 900px; */ } .main-description1 { position: absolute; top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(-50%); } .main-description h3 { font-size: 2rem; } .add-inputs, .add-inputs input { float: left; margin-right: 10px; margin-bottom: 2px; } .add-inputs button { border-radius: 0; } .add-inputs input { height: 48px; width: 65px; border-radius: 0; } .product-title { font-size: 1.1rem; font-weight: bold; } .product-price { font-size: 1.8rem; } .social-list { padding: 0; list-style: none; } .social-list li { float: left; padding: 6px 8px; margin-right: 12px; } .social-list li a { color: black; font-size: 2rem; } .social-list li a i { font-size: 2rem; }</style>
@section('content')
<div class="container my-5">
    <div class="card details-card p-0">
        <div class="row">
        <div class="container">
            <div class="carousel-fix">
            @foreach($images as $image)
            @if($product->id == $image->product_id)
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <img src="/images/{{$image->image}}" alt="">
                    </div>
                </div>
                <form action="{{route('myimage.destroy', $image->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" name='id' value = "{{$image->id}}" class="btn btn-danger">Delete</button>
                </form>
            @endif
            @endforeach
            </div>
        </div>


        <!-- End row -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
        <script>
            var dropzone = new Dropzone('#file-upload', {
                previewTemplate: document.querySelector('#preview-template').innerHTML,
                parallelUploads: 3,
                thumbnailHeight: 150,
                thumbnailWidth: 150,
                maxFilesize: 5,
                filesizeBase: 1500,
                thumbnail: function (file, dataUrl) {
                    if (file.previewElement) {
                        file.previewElement.classList.remove("dz-file-preview");
                        var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                        for (var i = 0; i < images.length; i++) {
                            var thumbnailElement = images[i];
                            thumbnailElement.alt = file.name;
                            thumbnailElement.src = dataUrl;
                        }
                        setTimeout(function () {
                            file.previewElement.classList.add("dz-image-preview");
                        }, 1);
                    }
                }
            });
            
            var minSteps = 6,
                maxSteps = 60,
                timeBetweenSteps = 100,
                bytesPerStep = 100000;
            dropzone.uploadFiles = function (files) {
                var self = this;
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                    for (var step = 0; step < totalSteps; step++) {
                        var duration = timeBetweenSteps * (step + 1);
                        setTimeout(function (file, totalSteps, step) {
                            return function () {
                                file.upload = {
                                    progress: 100 * (step + 1) / totalSteps,
                                    total: file.size,
                                    bytesSent: (step + 1) * file.size / totalSteps
                                };
                                self.emit('uploadprogress', file, file.upload.progress, file.upload
                                    .bytesSent);
                                if (file.upload.progress == 100) {
                                    file.status = Dropzone.SUCCESS;
                                    self.emit("success", file, 'success', null);
                                    self.emit("complete", file);
                                    self.processQueue();
                                }
                            };
                        }(file, totalSteps, step), duration);
                    }
                }
            }
        </script>
        <style>
            .dropzone {
                background: #e3e6ff;
                border-radius: 13px;
                max-width: 550px;
                margin-left: auto;
                margin-right: auto;
                border: 2px dotted #1833FF;
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <div id="dropzone">
            <form action="{{ route('dropzoneFileUpload') }}" class="dropzone" id="file-upload" enctype="multipart/form-data">
                @csrf
                <div class="dz-message">
                    Drag and Drop Single/Multiple Images Here<br>
                </div>
            </form>
        </div>
    </div>
@endsection