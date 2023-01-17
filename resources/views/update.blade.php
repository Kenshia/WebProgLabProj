@extends('header')

@section('content')
    <center>
        <div class="d-flex justify-content-between p-3 align-self-center" style="width:38%">
            <a href="/manage">
                <button type="button" class="btn btn-secondary">Back</button>
            </a>
        </div>
        <div class="d-flex flex-column"
            style="width:35%; margin-bottom:2%; padding-bottom:1%; padding-left:1%; padding-right:1%; border-radius:2%; background-color:white">
            <div class="text-left" style="padding-top: 2%; padding-bottom:2%">
                <p>Update Product</p>
            </div>
            <div class="form-outline mb-4 text-left">
                <input type="text" name="name" class="form-control" placeholder="Name" />
            </div>
            <div class="form-outline mb-4">
                <select class="form-select form-control" name="category">
                    <option selected>Select a Category</option>
                    <option value="Beauty">Beauty</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Utensil">Utensil</option>
                </select>
            </div>
            <div class="form-outline mb-4 text-left">
                <textarea name="detail" id="" class="form-control" rows="10" placeholder="Detail"></textarea>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="price" class="form-control" placeholder="Price " />
            </div>
            <div class="form-outline mb-4">
                image here
            </div>
            <div class="form-outline mb-4">
                <button type="button" class="btn btn-secondary">Add</button>
            </div>
    </center>
@endsection
