<nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
  <a class="navbar-brand" href="/">
    <img src="{{ asset('/img/main.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
    Магазин тортиков
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="ml-auto">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-shopping-cart"></i> Корзина
            <span class="badge badge-light count-in-cart" style="display: none;">0</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right cart" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item empty-message">Корзина пуста</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">Итог: <span id="cartPrice">0</span> руб</a>
            <a href="#" class="dropdown-item btn-primary" style="display: none;" data-toggle="modal" data-target="#orderModal">Заказать</a>
          </div>
        </div>
      </li>
    </ul>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/api/createorder" id="cartForm">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Заказ тортиков</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label for="email">E-mail адрес</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="nice@cakes.com">
              <small id="emailHelp" class="form-text text-muted">Ваша почта для связи с вами.</small>
            </div>
            <div class="form-group">
              <label for="phone">Сотовый телефон</label>
              <input type="email" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone" placeholder="+7ХХХ">
              <small id="phoneHelp" class="form-text text-muted">Ваш сотовый номер для связи с вами.</small>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" placeholder="Имя" name="firstName">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Фамилия" name="lastName">
              </div>
            </div>
            <div class="form-group">
              <label for="address">Адрес</label>
              <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" id="modalprice" readonly>
              <label for="modalprice">Сумма к оплате</label>
            </div>
            
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary create-order">Заказать</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Назад</button>
        </div>
      </form>
    </div>
    </div>
</div>
</nav>