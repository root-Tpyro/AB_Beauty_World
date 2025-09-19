import { useEffect } from 'react';
import { toast, ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

function App() {
  useEffect(() => {
    const message = window.toastMessage;
    let type = window.toastType || 'info';

    if (typeof type === 'string') {
      type = type.trim().toLowerCase();
    }

    if (message) {
      if (type === 'success') toast.success(message);
      else if (type === 'error') toast.error(message);
      else if (type === 'warn' || type === 'warning') toast.warn(message);
      else toast.info(message);
    }
  }, []);

  return (
    <>
      <ToastContainer />
    </>
  );
}

export default App;
