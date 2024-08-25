<br>
<div class="row">
  <img class="col-sm-4" src="{{$sp->hinh}}" alt="">
  <ul class="col-sm-8">
      <li class="list-group-item active"><h3>{{$sp->ten}}</h3></li><br>
      <li class="list-group-item active"><h4>Giá: {{$sp->gia}} VND</h4></li><hr>
 
      <p>Cân nặng: {{$sp->can_nang}}</p>
      <p>Tính chất: {{$sp->tinh_chat}}</p>
      <p><input type="number" value="1"></p>

      <a href="/themvaogio/{{$sp->id}}"><button class="btn btn-primary me-2 " type="button">Thêm vào giỏ hàng</button></a>

  </ul>

</div>
<hr>

