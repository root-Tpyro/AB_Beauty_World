<?Php
class ChatController extends Controller
{
    public function index()
    {
        $this->loadView("ChatView.php", []);
    }

    public function messages()
    {
        $user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
        $guest_id = isset($_GET['guest_id']) ? $_GET['guest_id'] : null;

        $conn = Connection::getInstance();
        $sql = "SELECT * FROM chatbox WHERE 1";

        if ($user_id) {
            $sql .= " AND user_id = $user_id";
        } elseif ($guest_id) {
            $sql .= " AND guest_id = " . $conn->quote($guest_id);
        }

        $sql .= " ORDER BY created_at ASC";
        $query = $conn->query($sql);
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);

        header("Content-Type: application/json");
        echo json_encode($messages);
    }
}
