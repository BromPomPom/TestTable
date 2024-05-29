from flask import Flask
import pymysql.cursors

app = Flask(__name__)

@app.route('/')
def index():
    return 'Welkom bij de HR applicatie van HolidayParks<br>'

@app.route('/connect_db')
def connect_db():
    # Verbinding maken met de database
    connection = pymysql.connect(
        host='srv-mysql-holidayparks-01.private.mysql.database.azure.com',
        user='jouw-gebruikersnaam',
        password='jouw-wachtwoord',
        db='db-suitecrm',
        cursorclass=pymysql.cursors.DictCursor
    )
    try:
        with connection.cursor() as cursor:
            # Maak een eenvoudige tabel
            sql = "CREATE TABLE IF NOT EXISTS test_table (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL)"
            cursor.execute(sql)
        connection.commit()
        return 'Succesvol verbonden en tabel aangemaakt'
    except Exception as e:
        return f'Fout bij het verbinden: {e}'
    finally:
        connection.close()

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8000)
