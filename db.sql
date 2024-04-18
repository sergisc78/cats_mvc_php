CREATE table
    roles(
        id INTEGER (255) PRIMARY KEY AUTO_INCREMENT,
        role VARCHAR (50) NOT NULL
    );

CREATE table
    users(
        id INTEGER (255) PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR (20) NOT NULL,
        user_password VARCHAR (255) NOT NULL,
        role_id INTEGER NULL,
        cat_id INTEGER NULL,
        Foreign Key (role_id) REFERENCES roles (id),
        Foreign Key (cat_id) REFERENCES cats (id)

    );

CREATE table
    cats(
        id INTEGER (255) PRIMARY KEY AUTO_INCREMENT,
        cat_name VARCHAR(60) NOT NULL,
        cat_sex VARCHAR(90) NOT NULL,
        cat_age VARCHAR (100) NOT NULL,
        cat_category VARCHAR (50) NOT NULL,
        cat_image VARCHAR(255) NULL,
        
    );



CREATE table
    users_cats(
        id INTEGER (255) PRIMARY KEY AUTO_INCREMENT,
        user_id INTEGER NOT NULL,
        cat_id INTEGER NOT NULL,
        FOREIGN Key (user_id) REFERENCES users(id) on DELETE CASCADE,
        FOREIGN Key (cat_id) REFERENCES cats(id) on DELETE CASCADE
    );