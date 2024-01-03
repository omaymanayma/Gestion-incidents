<script setup>
const data = [
  {
    DESCRIPTION: 'Problème de disque dur sur un poste de travail.',
    LOCALISATION: 'Bureau 104',
    DATEINCIDENT: '2024-01-01 09:00:00' ,
    PRIORITE: 1 ,
  },
  {
    DESCRIPTION: 'Problème de carte graphique sur un ordinateur portable.',
    LOCALISATION: 'Salle informatique A',
    DATEINCIDENT: '2024-01-02 10:30:00' ,
    PRIORITE: 2 ,
  },
  {
    DESCRIPTION: 'Erreur de mémoire détectée sur un serveur.',
    LOCALISATION: 'Centre de données',
    DATEINCIDENT: '2024-01-03 13:45:00' ,
    PRIORITE: 5 ,
  },
  {
    DESCRIPTION: 'Erreur système sur un poste de travail.',
    LOCALISATION: 'Bureau 203',
    DATEINCIDENT: '2024-01-04 14:15:00' ,
    PRIORITE: 3 ,
  },
  
]
const priorite = {
  1: 'Planning',
  2: 'Moderate',
  3: 'Low',
  4: 'High',
  5: 'Critical',
}
const prioriteColor = {
  Planning: 'success',
  Moderate: 'primary',
  Low: 'info',
  High: 'warning',
  Critical: 'error',
}
const headers = [
  'DESCRIPTION',
    'LOCALISATION',
    'DATEINCIDENT',
    'PRIORITE',
]
const usreList = data
</script>

<template>
  <VCard>
    <VTable
      :headers="headers"
      :items="usreList"
      item-key="description"
      class="table-rounded"
      hide-default-footer
      disable-sort
    >
      <thead>
        <tr>
          <th
            v-for="header in headers"
            :key="header"
          >
            {{ header }}
          </th>
        </tr>
      </thead>

      <tbody>
        <tr
          v-for="row in data"
          :key="row.DESCRIPTION"
        >
          <td>
            <div class="d-flex flex-column">
              <span class="d-block font-weight-semibold text--primary text-truncate">{{ row.DESCRIPTION }}</span>
            </div>
          </td>

          <td v-text="row.LOCALISATION" />
          <td v-text="row.DATEINCIDENT" />

          <!-- status -->
          <td>
            <VChip
              small
              :color="prioriteColor[priorite[row.PRIORITE]]"
              class="font-weight-medium"
            >
              {{ priorite[row.PRIORITE] }}
            </VChip>
          </td>
        </tr>
      </tbody>
    </VTable>
  </VCard>
</template>
