

  function actionDenyOrder(event){
    event.preventDefault();
   
    let urlRequest = $(this).data('url');

    let thisBtn = $(this);

    Swal.fire({
        title: 'Xác nhận hủy đơn hàng',
        text: "Bạn có muốn hủy đơn hàng này không?",
        icon: 'warning',
        showDenyButton: true,
        confirmButtonColor: '#3085d6',
        denyButtonColor: '#d33',
        confirmButtonText: 'Xác nhận hủy',
        denyButtonText: "Không hủy"
      }).then((result) => {
        // if(result.value){
        //   $.ajax({
        //     type: 'GET',
        //     url: urlRequest,
        //     success: function(data){
             
        //     },
        //     error:function(){

        //     }
        //   });
        // }
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location = urlRequest;
        } else if (result.isDenied) {
          Swal.fire('Bạn đã hủy thao tác', '', 'info')
        }
      })
      
   }

   $(function (){
       $(document).on('click', '.action-deny-order', actionDenyOrder)
   });
