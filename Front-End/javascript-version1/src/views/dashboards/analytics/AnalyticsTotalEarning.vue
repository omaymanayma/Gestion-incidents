<script setup>
import aviato from '@/assets/images/logos/aviato.png'
import bitbank from '@/assets/images/logos/bitbank.png'
import zipcar from '@/assets/images/logos/zipcar.png'
import incident from '@/assets/images/logos/incident.png'


const earnings = [
  {
    avatar: incident,
    title: 'Interruptions de service',
    subtitle: 'Pannes informatiques',
    amount: '02.00 Hour(s)',
    progress: 'primary',
  },
  {
    avatar: incident,
    title: 'Baisse de vitesse',
    subtitle: 'Pannes informatiques',
    amount: '02.35 Hour(s)',
    progress: 'info',
  },
  {
    avatar: incident,
    title: 'Problèmes de sécurité réseau',
    subtitle: 'Pannes informatiques',
    amount: '01.29 Hour(s)',
    progress: 'secondary',
  },
]
</script>

<template>
  <VCard>
    <VCardItem>
      <VCardTitle>Incident Resolution Time</VCardTitle>

      <template #append>
        <div class="me-n3">
          <VBtn
            icon
            size="x-small"
            variant="text"
            color="default"
          >
            <VIcon
              size="24"
              icon="mdi-dots-vertical"
            />
          </VBtn>
        </div>
      </template>
    </VCardItem>

    <VCardText class="pt-4">
      <div class="d-flex align-center">
        <h4 class="text-h4 me-2">
          03.53 Hour(s)
        </h4>

        <span class="text-success">
          <VIcon
            size="30"
            icon="mdi-menu-up"
          />
          <span>30%</span>
        </span>
      </div>
      <span class="text-xs">Compared to 04.59 last month</span>

      <VList class="card-list mt-9">
        <VListItem
          v-for="earning in earnings"
          :key="earning.title"
        >
          <template #prepend>
            <VAvatar
              rounded
              :image="earning.avatar"
            />
          </template>

          <VListItemTitle class="text-sm font-weight-semibold mb-1">
            {{ earning.title }}
          </VListItemTitle>
          <VListItemSubtitle class="text-xs">
            {{ earning.subtitle }}
          </VListItemSubtitle>

          <template #append>
            <div>
              <h6 class="text-sm mb-2">
                {{ earning.amount }}
              </h6>
              <VProgressLinear
                :color="earning.progress"
                model-value="80"
              />
            </div>
          </template>
        </VListItem>
      </VList>
    </VCardText>
  </VCard>
</template>

<style lang="scss" scoped>
.card-list {
  --v-card-list-gap: 2.625rem;
}
</style>
