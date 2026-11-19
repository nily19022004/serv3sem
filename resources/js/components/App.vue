<template>
    <div v-if="article" class="alert alert-primary" role="alert">
        Добавлена новая статья:
        <strong><a :href="`/article/${article.id}`">{{ article.name }}</a></strong>
    </div>
</template>

<script>
export default {
    data() {
        return { article: null };
    },
    mounted() {
        // Слушаем публичный канал 'articles' и событие 'NewArticleEvent'
        window.Echo.channel('articles')
            .listen('NewArticleEvent', (payload) => {
                console.log('Уведомление получено:', payload);
                this.article = payload; // Данные из broadcastWith()
            });
    }
};
</script>