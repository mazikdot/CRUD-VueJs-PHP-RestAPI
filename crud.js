
let app = new Vue({
    el: '#restapi',
    data: {
        allData:'',
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods:{
        fetchAllData(){
            axios.get('http://localhost/api_code_muhammad/product/read_paging.php',{
                action: 'fetchall'
            }).then(res=>{
                app.allData = res.data.records
                // console.log(res.data.records)
            })
        },
        openModal(){
        app.name = '';
        app.price = '';
        app.description = '';
        app.category_id = '';
        app.created = '';
        app.actionButton = 'Insert';
        app.dynamicTitle = 'Add Data';
        app.myModal = true;
        },
        submitData(){
            if(app.name != '' && app.price != '' && app.description != '' && app.category_id != '' && app.create != ''){
                if(app.actionButton == 'Insert'){
                axios.post('http://localhost/api_code_muhammad/product/create.php',{
                    action: 'insert',
                    name: app.name,
                    price: app.price,
                    description: app.description,
                    category_id: app.category_id,
                    created: app.created
                }).then(res=>{
                    app.myModal = false;
                    app.fetchAllData();
                    app.name = '';
                    app.price = '';
                    app.description = '';
                    app.category_id = '';
                    app.created = '';
                    if(res.data.message == 'Product was created.'){
                    swal(res.data.message, "Insert Success fully", "success").then(function(){
                        location.reload();
                    });
                }
                })
            }
                if(app.actionButton == 'Update'){
                    axios.post('http://localhost/api_code_muhammad/product/update.php',{
                        action: 'update',
                        name: app.name,
                        price: app.price,
                        description: app.description,
                        category_id: app.category_id,
                        created: app.created,
                        hiddenId: app.hiddenId
                    }).then(res=>{
                        app.myModal = false;
                        app.fetchAllData();
                        app.name = '';
                        app.price = '';
                        app.description = '';
                        app.category_id = '';
                        app.created = '';
                        app.hiddenId = '';
                        if(res.data.message == 'Product was updated.'){
                        swal(res.data.message,'Update Success fully','success').then(function(){
                            location.reload();
                        });
                         }else
                         {
                            swal(res.data.message,'Update Success fully','error').then(function(){
                                location.reload();
                            });
                         }    
                    })
                }
          }
        },
        fetchData(id){
            axios.post('http://localhost/api_code_muhammad/product/read_one.php',{
                id: id,
                action: 'fetchSingle'
               
            }).then(res=>{
                app.name = res.data.name;
                // console.log(res.data.category_id)
                app.price = res.data.price;
                app.description = res.data.description;
                app.category_id = res.data.category_id;
                app.created = res.data.created;
                app.hiddenId = res.data.id;
                app.myModal = true;
             
                app.actionButton = 'Update';
                app.dynamicTitle = 'Edit Data';
            });
        },
        deleteData(id){
            swal({
                title: "คุณต้องการลบข้อมูลนี้ ใช่หรือไม่",
                text: "หากทำการลบแล้วไม่สามารถเอาข้อมูลเดิมกลับมาได้",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
             .then((willDelete) => {
                  if (willDelete) {
                    axios.post('http://localhost/api_code_muhammad/product/delete.php',{
                        action: 'delete',
                        id: id
                    }).then(res=>{
                        swal(res.data.message,'Deleted Success fully!','success').then(function(){
                            location.reload();
                        });
                    })     
                  } else {
                    // swal('ข้อมูลไม่ได้ถูกลบ','','error').then(function(){
                    //     location.reload();
                    // });
              }
           });
        }
    },
    created(){
        this.fetchAllData();
    }
})
   