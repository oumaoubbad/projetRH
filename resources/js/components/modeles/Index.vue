<template>
    <div>
      
<div class="container">
    <div class="row my-5">
        <div class="col-md-11 mx-auto">
       
            <div class="card my-3">
   
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="text-center font-weight-bold ">
            <div class="pull-left">
                <h2>Modèles</h2>
            </div>
            <div class="pull-right my">
                <router-link
                                :to="{ name: 'ModelesCreate' }"
                                class="btn btn-danger mb-2">
                                Ajouter Modéle
                </router-link>
            </div>
            </div>
          
            
        </div>
       
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Modéle</th>
                        <th>Marque</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
               
                <tr>
                  <th scope="row"></th>
                  <th></th>
                  <th></th>
                  <th>
                      
                  <form>     
                    <a class="btn btn-dark" href=""> <i class="fas fa-eye"></i> </a>
      
                    <a class="btn btn-secondary" href=""> <i class="fas fa-edit "></i> </a>
     
                   
        
                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>

                   </form>
                  </th>
                  
                </tr>
              
              </tbody>
              
            </table>
        </div>
        </div>
</div>
</div>
</div>

    </div>

</template>

<script>
export default {}
</script>

<style></style>
