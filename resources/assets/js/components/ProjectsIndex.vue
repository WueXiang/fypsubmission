<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createProject'}" class="btn btn-success">Create new project</router-link>
        </div>
 
        <div class="panel panel-default">
            <div class="panel-heading">Project list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Specialization</th>
                        <th>Supervisor</th>
                        <th>Co-Supervisor</th>
                        <th>Moderator</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="project, index in projects">
                        <td>{{ project.title_id }}</td>
                        <td>{{ project.title_name }}</td>
                        <td>{{ project.project_type }}</td>
                        <td>{{ project.specialization }}</td>
                        <td>{{ project.supervisor_id }}</td>
                        <td>{{ project.co_supervisor_id }}</td>
                        <td>{{ project.moderator_id }}</td>
                        <td>
                            <router-link :to="{name: 'editProject', params: {id: project.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(project.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data: function () {
            return {
                projects: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/projects')
                .then(function (resp) {
                    app.projects = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load projects");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/projects/' + id)
                        .then(function (resp) {
                            app.projects.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete project");
                        });
                }
            }
        }
    }
</script>