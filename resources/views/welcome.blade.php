<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Douglas - Pagamento Cielo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="container">
            <form class="needs-validation" novalidate="" action="{{route('peyer')}}" method="post">
                @csrf
                <hr class="mb-4">

                <h4 class="mb-3">Pagamento com Cielo</h4>

                <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                    <label class="custom-control-label" for="credit">Cartão de Crédito</label>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Nome</label>
                    <input type="text" name="holder" class="form-control" id="cc-name" placeholder="" required="" >
                    <small class="text-muted">Nome escrito no Cartão</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Número do Cartão</label>
                    <input type="text" name="numberCard" class="form-control" maxlength="16" id="cc-number" placeholder="" required="">
                </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                    <label>Bandeira</label>
                    <div class="input-group mb-3">
                      <select class="custom-select" name="flag">
                        <option selected>Escolher...</option>
                        <option value="Visa">Visa</option>
                        <option value="MasterCard">MasterCard</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Vencimento</label>
                    <input type="text" name="date" class="form-control" id="cc-expiration" placeholder="" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-cvv">CVV</label>
                    <input type="text" name="cvv" class="form-control" id="cc-cvv" maxlength="3" placeholder="" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Valor</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                  </div>
                  <input type="text" class="form-control" name="price" aria-label="Quantia">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Pagar agora</button>
            </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../resources/js/jquery.maskedinput.js"></script>
        <script>
			$( function() {
				$('#cc-expiration').mask('99/9999');
			})
		</script>
    </body>
</html>
