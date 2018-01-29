<template>
    <div>
        <div class="form-group">
            <router-link to="/project/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new project</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Project title</label>
                            <input type="text" v-model="project.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Project type</label>
                            <!-- <input type="text" v-model="project.project_type" class="form-control"> -->
                            <select name="project_type" v-model="project.project_type" class="form-control">
                                <option value="Project">Project</option>
                                <option value="Research">Research</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Project specialization</label>
                            <select name="specialization" v-model="project.specialization" class="form-control">
                                <option value="SE">SE</option>
                                <option value="IS">IS</option>
                                <option value="DS">DS</option>
                                <option value="GD">GD</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                project: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newProduct = app.project;
                axios.post('/api/v1/projects', newProduct)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your project");
                    });
            }
        }
    }
</script>
