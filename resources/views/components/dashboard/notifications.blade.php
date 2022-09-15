<head>
      <style>
          .slick-prev:before {
              color: #265097;
          }

          .slick-next:before {
              color: #265097;
          }
      </style>
  </head>


  <h2 class="my_events">Notificações</h2>
  <div class="carousel_notifications">
      

      
      <div class="carousel_item">
          <h2>Não há notificações disponíveis</h2>
      </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {
          $('.carousel_notifications').slick({
              infinite: false,
              slidesToShow: 3,
              slidesToScroll: 3
          });
      });
  </script>

  </body>

  </html>