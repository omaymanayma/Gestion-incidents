<template>
    <div style="padding: 50px; padding-top: 8%">
    <NavBar></NavBar>
        
        <v-data-table :headers="headers" :items="incidents" sort-by="item.id_incident" class="elevation-1" :search="search"
            :loading="loading">
            <template v-slot:top>
                <v-toolbar flat>
                    <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                        hide-details></v-text-field>
                    <v-spacer></v-spacer>

                    <v-dialog v-model="dialog" max-width="700px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn color="#002f6c" class="mb-2 btn white--text" v-bind="attrs" v-on="on">
                                <v-icon left> mdi-account-multiple-plus </v-icon>
                                Add
                            </v-btn>
                        </template>
                        <v-card>
                            <v-toolbar dark color="primary">
                                <v-btn icon dark @click="close(item)">
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>ADD INCIDENT</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items> </v-toolbar-items>
                            </v-toolbar>
                            <v-card-title class="text-h5 grey--text text--darken-3">
                                Incident Details:
                            </v-card-title>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="6">
                                        <v-text-field v-model="editedItem.nom" label="Nom" outlined></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-text-field v-model="editedItem.type" label="Type" outlined></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-text-field v-model="editedItem.date" label="Date" outlined></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-text-field v-model="editedItem.description" label="Description"
                                            outlined></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-text-field v-model="editedItem.location" label="Location"
                                            outlined></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-text-field v-model="editedItem.userId" label="UserID" outlined></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn depressed color="" @click="dialog = false"> Close </v-btn>
                                <v-btn depressed color="primary" @click="save()"> Save </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                
                    <v-dialog v-model="dialogConfirmationModifier" max-width="600px">
                <v-card>
                     <v-toolbar dark color="error">
                                    <v-btn icon dark @click="close(item)">
                                        <v-icon>mdi-close</v-icon>
                                    </v-btn>
                                    <v-toolbar-title>Warning ! </v-toolbar-title>
                                    <v-card-title class="text-h5"
                        >Are you sure you want to Modifier this user?</v-card-title>
                                    <v-spacer></v-spacer>
                                    <v-toolbar-items> </v-toolbar-items>
                                </v-toolbar>
                  <v-card-actions>
                    
                     <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6">
                                            <v-text-field v-model="editedItem.nom" label="Nom" outlined></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-text-field v-model="editedItem.type" label="Type" outlined></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-text-field v-model="editedItem.date" label="Date" outlined></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-text-field v-model="editedItem.description" label="Description"
                                                outlined></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-text-field v-model="editedItem.location" label="Location"
                                                outlined></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-text-field v-model="editedItem.userId" label="UserID" outlined></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                                <v-spacer></v-spacer>
                        <v-btn depressed color="" @click="dialogConfirmationModifier = false"  >Cancel</v-btn >
                        <v-btn depressed color="error" @click="save()">OK</v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>


              <v-dialog v-model="dialogDelete" max-width="500px">
                <v-card>
                  <v-toolbar dark color="error">
                    <v-toolbar-title>Warning !</v-toolbar-title>
                  </v-toolbar>
                  <v-card-title class="text-h5"
                    >Are you sure you want to delete this user?</v-card-title
                  >
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn depressed color="" @click="closeDelete">Cancel</v-btn>
                    <v-btn depressed color="error" @click="deleteItemConfirm"
                      >OK</v-btn
                    >
                    <v-spacer></v-spacer>
                  </v-card-actions>
                </v-card>
              </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:[`item.actions`]="{ item }">
                <v-btn color="primary" class="mr-2 white--text" @click="editItem(item)">
                    <v-icon medium class="mr-2"> mdi-pencil </v-icon>
                </v-btn>
                <v-btn color="#f46" class="mr-2 white--text" @click="deleteItem(item)">
                    <v-icon medium @click="deleteItem(item)"> mdi-delete </v-icon>
                </v-btn>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="initialize()"> Reset </v-btn>
            </template>
        </v-data-table>
        <LoadingPage v-if="LoadingPage == true" />
    </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";


export default {
    name: "IncidentsGestion",
     components: {
        NavBar, // Include the NavBar component in the components section
    },

    data() {
        return {
            dialog: false,
            search: "",
            loading: "false",
            headers: [
                { text: "ID", value: "id_incident", align: "start", sortable: true },
                { text: "Nom", value: "nom", sortable: true },
                { text: "Type", value: "type", sortable: true },
                { text: "Date", value: "date", sortable: true },
                { text: "Description", value: "description", sortable: true },
                { text: "Location", value: "location", sortable: true },
                { text: "UserID", value: "userId", sortable: true },
                { text: "Actions", value: "actions", sortable: false },
            ],
            editedItem: {
                id_incident: 0,
                nom: "",
                type: "",
                date: "",
                description: "",
                location: "",
                userId: 0,
            },
            defaultItem: {
                id_incident: 0,
                nom: "",
                type: "",
                date: "",
                description: "",
                location: "",
                userId: 0,
            },
              incidents: [
                {
                    id_incident: 1,
                    nom: "Incident 1",
                    type: "Type A",
                    date: "2023-12-07",
                    description: "Description de l'incident 1",
                    location: "Lieu 1",
                    userId: 101,
                },
                {
                    id_incident: 2,
                    nom: "Incident 2",
                    type: "Type B",
                    date: "2023-12-08",
                    description: "Description de l'incident 2",
                    location: "Lieu 2",
                    userId: 102,
                },
                // Ajoutez d'autres incidents comme nécessaire
            ],
        };
    },
    methods: {
        // You can leave this section empty since you only want the view
       initialize() {
            this.setIncidentsAction().then(() => {
                this.incidents = [...this.getIncidents];
            });
        },

        editItem(item) {
            this.editedIndex = this.incidents.indexOf(item);
            this.editedItem = { ...item };
            this.dialogModifier = true;
        },
    },

};
</script>
