/**
 * @typedef {import('@roots/bud').Bud} bud
 *
 * @param {bud} app
 */
module.exports = async (app) => {
  app
    /**
     * Application entrypoints
     *
     * Paths are relative to your resources directory
     */
    .entry({
      app: ['@scripts/app', '@styles/app'],
    })

    /**
     * These files should be processed as part of the build
     * even if they are not explicitly imported in application assets.
     */
    .assets('images')

    /**
     * These files will trigger a full page reload
     * when modified.
     */
    .watch('resources/views/**/*', 'app/**/*')

    /**
     * Target URL to be proxied by the dev server.
     *
     * This should be the URL you use to visit your local development server.
     */
    .proxy('http://van-wijk-uitvaartkisten.local')

    /**
     * Development URL to be used in the browser.
     */
    .serve('http://localhost:3000');

    /**
     * Auto fix stylelint errors on save
     */
    app
      .extensions
      .get('stylelint-webpack-plugin').setOptions(options => ({
        ...options,
        fix: true,
      }));
  };
