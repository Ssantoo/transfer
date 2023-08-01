<template>
    <v-dialog
      v-model="dialog"
      persistent
      max-width="580"
    >
      <v-card class="pa-3">
        <v-card-title class="text-h5 mb-3">
          {{ translations ? (translations['권한이 없습니다.'] || '권한이 없습니다.') : '권한이 없습니다.' }}
        </v-card-title>
        <v-card-text>
          <v-row>
            <v-col>
              {{ translations ? (translations['관리자에게 권한을 문의 해 주시기 바랍니다.'] || '관리자에게 권한을 문의 해 주시기 바랍니다.') : '관리자에게 권한을 문의 해 주시기 바랍니다.' }}
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
              outlined
              elevation="0"
          >
            {{ translations ? (translations['확인'] || '확인') : '확인' }}
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </template>
  
  <script>
  import { mapState } from 'vuex';
  
  export default {
    computed: {
      ...mapState('language', ['selectedLanguage', 'translations']),
    },
    
  };
  </script>
  