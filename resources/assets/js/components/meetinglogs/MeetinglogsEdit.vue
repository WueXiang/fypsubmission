
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit project</div>
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
                    <!-- <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Project email</label>
                            <input type="text" v-model="project.email" class="form-control">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.projectId = id;
            axios.get('/api/v1/projects/' + id)
                .then(function (resp) {
                    app.project = resp.data;
                })
                .catch(function () {
                    alert("Could not load your project")
                });
        },
        data: function () {
            return {
                projectId: null,
                project: {
                    title: '',
                    project_type: '',
                    specialization: '',
                    // email: '',
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newProject = app.project;
                axios.patch('/api/v1/projects/' + app.projectId, newProject)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your project");
                    });
            }
        }
    }
</script>
