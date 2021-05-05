Installation
--------------------
1. Create and configure the `.env` file.

2. Create database schemas
    ```
    bin/console doctrine:schema:create --force
    ```
3. Run built-in web server
     ```
     bin/console server:start
     ```
4. Install & Build assets
     ```
     yarn install
     yarn run build
     ```

