<template>
    <div>

      <div class="container">
    <div class="row my-5 ">
        <div class="col-md-8 mx-auto">
            <div class="card">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                    Ajouter 
                                </h3>

                  <form >
       
                              <div class="form-group">
                              <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
                              </div>
                              <div class="form-group">
                               <strong>Marque:</strong>
          <select
                                            v-model="form.marque_id"
                                            name="marque"
                                            class="form-control"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="marque in marques"
                                                :key="marque.id"
                                                :value="marque.id"
                                                >{{ marque.name }}</option
                                            >
                                        </select>
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-danger">
                                      Ajouter
                                  </button>
                                  
                                  
                <a class="btn btn-secondary" href=""> Back</a>
          
                              </div>
                              </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
   
</template>

<script>


export default {
    components: {
       
    },
    data() {
        return {
            marques: [],
           
            form: {
                name: "",
                marque_id: "",
                
            }
        };
    },
    created() {
        this.getMarques();
        
    },
    methods: {
        getMarques() {
            axios
                .get("/api/modeles/marques")
                .then(res => {
                    this.marques = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
     }
    }

</script>

<style></style>
