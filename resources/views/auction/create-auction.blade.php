@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{ route('newAuction') }}" method="POST" files="true" enctype="multipart/form-data">
      @csrf
      <div class="d-md-flex align-items-center flex-lg-row my-1">
      <div class="col">
        <div class="d-flex justify-content-center align-items-end ">
          <img id="previewImg" src="../../img/empty.png" class="previewImg img-fluid"/>
          
          <label for="image" class="addImgBtn">
          <span class="material-icons-outlined md-36">add</span>
          </label>
          <input class="d-none" type="file" accept="image/*" name="image" id="image" onchange="showPreview(this)">
        </div> 
      </div>
      <div class="col">
          <label for="name">Název</label>
          <input type="text" class="form-control" id="name" name="name" required oninvalid="this.setCustomValidity('Zadejte název aukce')">

          <label for="name">Popis</label>
          <textarea class="form-control" id="description" name="description" rows="4"></textarea>

      </div>
      </div>
      <div class="d-md-flex  flex-lg-row my-1">
        <div class="col">
          <label for="startPrice">Počáteční cena</label>
          <input type="number" class="form-control" id="stratPrice" name="stratPrice" required oninvalid="this.setCustomValidity('Zadejte počáteční cenu')">
        </div>
        <div class="col">
          <label for="bidRange">Rozsah příhozů</label>
          <div class="d-flex" id="bidRange">
            <input type="number" class="form-control mr-1" id="stratRange">
            <input type="number" class="form-control" id="endRange">
          </div>
        </div>
      </div>

      <div class="d-md-flex  flex-lg-row my-1">
        <div class="col">
          <label for="auctionStart">Začátek aukce</label>
          <input type="datetime-local" class="form-control" id="auctionStart" name="auctionStart" required oninvalid="this.setCustomValidity('Vyplnite toto policko')"/>
        </div>
        <div class="col">
          <label for="auctionEnd">Konec aukce</label>
          <input type="datetime-local" class="form-control" id="auctionEnd" name="auctionEnd"/>
        </div>
          <script>
            function getToday(){
              var date = new Date();
              var dateTime = date.toISOString().slice(0, 16);
            return dateTime;
            }
            $(document).ready(function (){
              $("#auctionStart").val(getToday());
              $("#auctionStart").attr("min", getToday());
              $("#auctionEnd").val(getToday());
              $("#auctionEnd").attr("min", getToday());
            })
          </script>
      </div>
      <div class="d-md-flex  flex-lg-row my-1">
        <div class="col">
          <label for="type">Typ aukce</label>
          <div class="d-flex choose-from-2" id="type">
            <div class="col chooseBtn label-green text-center chooseBtn-not-checked" id="btnbuy" onclick="chooseFromClicked('#btnbuy', '#btnsell')">
              Nákup
              <input type="radio" name="is_selling" id="buy" class="d-none" value="0" />
            </div>
            <div class="col chooseBtn label-yellow text-center" id="btnsell" onclick="chooseFromClicked('#btnsell', '#btnbuy')">
              Prodej
              <input type="radio" checked="checked" name="is_selling" id="sell" class="d-none" value="1" />
            </div>
          </div>
        </div>
        <div class="col">
          <label for="rules">Pravidla aukce</label>
          <div class="d-flex choose-from-2" id="rules">
            <div class="col chooseBtn label-green text-center " id="btnopen" onclick="chooseFromClicked('#btnopen', '#btnclosed')">
              Otevřená
              <input type="radio" checked="checked" name="is_open" id="open" class="d-none" value="1" />
            </div>
            <div class="col chooseBtn label-yellow text-center chooseBtn-not-checked" id="btnclosed" onclick="chooseFromClicked('#btnclosed', '#btnopen')">
              Uzavřená
              <input type="radio" name="is_open" id="closed" class="d-none" value="0" />
            </div>
          </div>
        </div>
        </div>      
        <div class="col">
          <input type="submit" value="Odeslat ke schválení" class="btn btn-success btn-block mt-2">
        </div>
      
  </div>
@endsection
