<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apiquerysandbox.cieloecommerce.cielo.com.br/1/sales/" . $teste,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "MerchantId: aeff347f-5567-4512-bb01-d146c261a6c3",
    "MerchantKey: KPUTWRPRUIYOKUTGEMBMEJHOQDMSAPQCFZYISTPG"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$obj = json_decode($response);


$name       = $obj->Customer->Name;
$numeroCard = $obj->Payment->CreditCard->CardNumber;
$vencimento = $obj->Payment->CreditCard->ExpirationDate;
$bandeira   = $obj->Payment->CreditCard->Brand;
$tipo       = $obj->Payment->Type;
$id         = $obj->Payment->Tid;

?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Transação efetuada com sucesso!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="card text-center">
            <div class="card-header">
                Sucesso!
            </div>
            <div class="card-body">
                <h5 class="card-title">Confirmação de pagamento</h5>
                <p class="card-text"><strong>{{$holder}}</strong> seu pagamento foi realizado com sucesso!</p>
                
                <p class="btn btn-primary">No valor de R$ {{$total}}</p>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPag">
                    Detalhes do Pagamento
                </button>
            </div>
            <div class="card-footer text-muted">
                {{@date('d/m/Y')}}
            </div>
            <div class="card-body" id="voltar">
                <a href="../public" class="btn-sm btn-info" >Voltar</a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalPag" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Detalhes do Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                      <span class="detalhe">Nome</span>
                      <li class="list-group-item list-group-item-info"><?php echo $name;?></li>
                    </div>
                    <div class="alert alert-info" role="alert">
                      <span class="detalhe">Número Cartão</span>
                      <li class="list-group-item list-group-item-info"><?php echo $numeroCard;?></li>
                    </div>
                    <div class="alert alert-info" role="alert">
                      <span class="detalhe">Vencimento</span>
                      <li class="list-group-item list-group-item-info"><?php echo $vencimento;?></li>
                    </div>
                    <div class="alert alert-info" role="alert">
                      <span class="detalhe">Bandeira</span>
                      <li class="list-group-item list-group-item-info"><?php echo $bandeira;?></li>
                    </div>
                    <div class="alert alert-info" role="alert">
                      <span class="detalhe">Tipo de Transação</span>
                      <li class="list-group-item list-group-item-info"><?php echo $tipo;?></li>
                    </div>
                    <div class="alert alert-info" role="alert">
                      <span class="detalhe">Identificador</span>
                      <li class="list-group-item list-group-item-info"><?php echo $id;?></li>
                    </div>
                  </div>
                  <style>
                      .detalhe{
                        font-size: 10px;
                      }
                      .card-body{
                        padding:0px;
                        margin-bottom:15px;
                      }
                      #voltar{
                        padding:5px;
                      }
                  </style>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>