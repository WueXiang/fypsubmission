<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createMeetinglog'}" class="btn btn-success">Create new meetinglog</router-link>
        </div>
        <!-- <div class="panel panel-default"> -->
            <!-- <div class="panel-heading">Project list</div> -->
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Meeting Date</th>
                        <th>Work Done</th>
                        <th>Work To Be Done</th>

                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="meetinglog, index in meetinglogs">
                        <td>{{ meetinglog.id }}</td>
                        <td>{{ meetinglog.meeting_date }}</td>
                        <td>{{ meetinglog.work_done }}</td>
                        <td>{{ meetinglog.work_to_be_done }}</td>
                        <td>
                            <router-link :to="{name: 'editMeetinglog', params: {id: meetinglog.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(meetinglog.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        <!-- </div> -->
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                meetinglogs: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/meetinglogs')
                .then(function (resp) {
                    app.meetinglogs = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load meetinglogs");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/meetinglogs/' + id)
                        .then(function (resp) {
                            app.meetinglogs.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete meetinglog");
                        });
                }
            }
        }
    }
</script>