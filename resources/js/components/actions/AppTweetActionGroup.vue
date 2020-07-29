<template>
    <ul class="flex mt-4">
        <app-tweet-comment-action />
        <app-tweet-like-action :tweet="tweet"/>
        <app-tweet-retweet-action/>
    </ul>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        }
    }
</script>
