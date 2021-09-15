<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet"> -->
     <script src="alert.js"></script>
     <link rel="stylesheet" href="css_bs5/bootstrap.min.css">
    <title>Vue js REST API</title>
    <style>
        [v-cloak]{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5" id = "restapi" v-cloak> 
    <br>
    <h3 align ="center">Product</h3>
    <hr>
    <br>
    <div class="row">
    <div class="col-md-6">
     <h3 class="panel-title">Users data</h3>
     </div>
        <div class="col-md-6" align="right">
           <input type="button" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#myModal" 
          @click ="openModal"  value="Add">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>category_id</th>
                <th>category_name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tr v-for="row in allData">
              <td>{{row.id}}</td>
              <td>{{row.name}}</td>
              <td>{{row.description}}</td>
              <td>{{row.price}}</td>
              <td>{{row.category_id}}</td>
              <td>{{row.category_name}}</td>
             
              <td>
                  <button type="button" name="edit" class="btn btn-primary btn-xs edit" data-bs-toggle="modal"
                  data-bs-target="#myModal" @click="fetchData(row.id)">Edit</button>
                 
              </td>
              <td>
              <button type="button" name="delete" class="btn btn-danger btn-xs delete" data-bs-toggle="modal"
                  data-bs-target="#myModal" @click="deleteData(row.id)"
                  >Delete</button>
              </td>
            </tr>
        </table>
    </div>
  
    <div v-if="myModal" class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mpdal-title">{{dynamicTitle}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss = "modal"
                aria-labal="Close" @click="myModal=false"
                ></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">name</label>
                    <input v-model="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" v-model="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text"  v-model="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">category_id</label>
                    <input type="text"  v-model="category_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="created">created</label>
                    <input type="text"   v-model="created" class="form-control">
                </div>
                <br>
                <div class="modal-footer">
                    <input type="hidden" v-model ="hiddenId">
                    <input type="button" v-model ="actionButton" class="btn btn-success bt-xs" @click="submitData">

                </div>
            </div>
        </div>
    </div>
    </div>
    <a href="category.php"><button class="btn btn-warning">Category</button></a>
    <a  href ="sr.php"><button class="btn btn-primary">Search php</button></a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- <script src="unkpg.js"></script> -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- <script src="axios.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->>
<script src="crud.js"></script>
<script src="bundle.js"></script>
</body>
</html>