<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Vue js REST API</title>
</head>
<body>
    <div class="container mt-5" id = "restapi"> 
    <br>
    <h3 align ="center">CRUD REST API</h3>
    <h3 align ="center">Category</h3>
    <hr>
    <br>
    <div class="row">
    <div class="col-md-6">
     <h3 class="panel-title">Users data</h3>
     </div>
        <div class="col-md-6" align="right">
           <input type="button" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#myModal" value="Add">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>Action</th>
            </tr>
            <tr v-for="row in post">
              <td>{{row.id}}</td>
              <td>{{row.name}}</td>
              <td>{{row.description}}</td>
             
              <td>
                  <button type="button" name="edit" class="btn btn-primary btn-xs edit" data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >Edit</button>
                  <button type="button" name="edit" class="btn btn-danger btn-xs edit" data-bs-toggle="modal"
                  data-bs-target="#myModal" @click ="deleteData(row.id)"
                  >Delete</button>
              </td>
            </tr>
        </table>
    </div>
  
    <div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mpdal-title">Add data</h4>
                <button type="button" class="btn-close" data-bs-dismiss = "modal"
                aria-labal="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="id">id</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="created">created</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="modified">modified</label>
                    <input type="text" class="form-control">
                </div>
                <br>
                <div class="modal-footer">
                    <input type="hidden">
                    <input type="button" class="btn btn-success bt-xs">

                </div>
            </div>
        </div>
    </div>
    </div>
   <a href="index.php"><button class="btn btn-warning">Product</button></a>
   <a  href ="sr.php"><button class="btn btn-primary">Search php</button></a>
    </div>

<script>       
        new Vue({
            el: '#restapi',
            data(){
                return {
                    post:[]
                }
            },
            // มันจะทำงานก็ต่อเมื่อโหลดเสร็จทุกอย่างแล้ว
            mounted(){
                axios.get('http://localhost/api_code/category/read.php')
                .then((res)=> {
                    this.post = res.data.records
                    console.log(res)
                })
            }
        })       
    
    </script>
</body>
</html>