<template>
    <div style="padding: 50px; padding-top: 8%">
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
                            <v-toolbar color="#002f6c">
                                <v-btn icon dark @click="dialog = false">
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title class="mb-2 btn white--text">ADD INCIDENT</v-toolbar-title>
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
                                <v-btn depressed color="" @click="close"> Close </v-btn>
                                <v-btn depressed color="#8eb5e8" @click="addIncident()"> Save </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog v-model="dialogModifier" max-width="700px">
                        <v-card>
                            <v-toolbar dark color="#002f6c">
                                <v-btn icon dark @click="close(item)">
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Edit INCIDENT</v-toolbar-title>
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
                                <v-btn depressed color="" @click="close"> Close </v-btn>
                                <v-btn depressed color="#8eb5e8" @click="editIncident()"> Save </v-btn>
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
                                <v-card-title class="text-h5">Are you sure you want to Modifier this
                                    incident?</v-card-title>
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
                        
                                    <v-text-field v - model="editedItem.userId" label="UserID" outlined></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                    <v-spacer></v-spacer>
                                    <v-btn depressed color="" @click="close">Cancel</v-btn>
                                    <v-btn depressed color="error" @click="editIncident()">OK</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>

                        <v-dialog v-model=" dialogDelete " max-width="500px">
                            <v-card>
                                <v-toolbar dark color="error">
                                    <v-toolbar-title>Warning !</v-toolbar-title>
                                </v-toolbar>
                                <v-card-title class="text-h5">Are you sure you want to delete this incident?</v-card-title>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn depressed color="" @click="close">Cancel</v-btn>
                                    <v-btn depressed color="error" @click=" deleteIncidentConfirm ">OK</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:[`item.actions`]="{ item }">
                    <v-btn color="#8eb5e8" class="mr-2 white--text" @click="editItem(item)">
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
            <LoadingPage v-if=" LoadingPage == true " />
        </div>
</template>



<script>
import axios from 'axios';

export default {
    name: "IncidentsGestion",
    components: {},

    data() {
        return {
            dialog: false,
            dialogModifier: false,
            dialogConfirmationModifier: false,
            dialogDelete: false,
            search: "",
            loading: false,
            editedIndex: -1,
            editedItem: {
                id: 0,
                name: "",
                type: "",
                date: "",
                description: "",
                location: "",
                userId: 0,
            },
            defaultItem: {
                id: 0,
                name: "",
                type: "",
                date: "",
                description: "",
                location: "",
                userId: 0,
            },
            incidents: [],
            headers: [
                { text: "ID", value: "id", sortable: true },
                { text: "Nom", value: "name", sortable: true },
                { text: "Type", value: "type", sortable: true },
                { text: "Date", value: "date", sortable: true },
                { text: "Description", value: "description", sortable: true },
                { text: "Location", value: "location", sortable: true },
                { text: "Actions", value: "userId", sortable: true },
                { text: "Modifications", value: "actions", sortable: false },
            ],
        };
    },

    methods: {
        async initialize() {
            try {
                this.loading = true;
                const response = await axios.get('http://127.0.0.1:8000/api/incidents');
                this.incidents = response.data;
            } catch (error) {
                console.error('Error fetching incidents:', error);
            } finally {
                this.loading = false;
            }
        },

        // ... other methods ...
    },
    initialize() {
        // Vous pouvez ajouter le code d'initialisation ici si nécessaire
    },

    editItem(item) {
        this.editedIndex = this.incidents.indexOf(item);
        this.editedItem = { ...item };
        this.dialogModifier = true;
    },

    addIncident() {
        // Ajoutez le code pour ajouter un nouvel incident
        // Utilisez this.editedItem pour accéder aux valeurs du nouvel incident
        // Assurez-vous de mettre à jour votre liste incidents avec le nouvel incident
        this.incidents.push({ ...this.editedItem });
        this.dialog = false; // Fermez la boîte de dialogue après avoir ajouté l'incident
        this.resetEditedItem(); // Réinitialisez editedItem après l'ajout
    },

    editIncident() {
        // Ajoutez le code pour éditer l'incident
        // Utilisez this.editedItem pour accéder aux valeurs de l'incident édité
        // Assurez-vous de mettre à jour votre liste incidents avec les modifications
        this.incidents.splice(this.editedIndex, 1, { ...this.editedItem });
        this.dialogModifier = false; // Fermez la boîte de dialogue après avoir édité l'incident
        this.resetEditedItem(); // Réinitialisez editedItem après l'édition
    },

    deleteIncidentConfirm() {
        // Ajoutez le code pour confirmer la suppression de l'incident
        // Utilisez this.editedItem pour accéder aux valeurs de l'incident à supprimer
        // Assurez-vous de mettre à jour votre liste incidents en supprimant l'incident
        this.incidents.splice(this.editedIndex, 1);
        this.dialogDelete = false; // Fermez la boîte de dialogue de confirmation de suppression
        this.resetEditedItem(); // Réinitialisez editedItem après la suppression
    },

    resetEditedItem() {
        // Réinitialisez les valeurs de editedItem à celles de defaultItem
        this.editedItem = { ...this.defaultItem };
    },
    

    mounted() {
        this.initialize();
    },
    close() {
        // Cette méthode sera utilisée pour fermer la boîte de dialogue
        this.dialog = false;
        this.dialogModifier = false;
        this.dialogConfirmationModifier = false;
        this.dialogDelete = false;
    },
};
</script>
