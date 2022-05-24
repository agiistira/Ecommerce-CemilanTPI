public class test{
    static Thread createThread(final int i, final Thread t1){
        Thread t2 = new Thread() {
            public void run() {
                System.out.println(i+1);
                try {
                    t1.join();
                }catch (InterruptedException e) {

                }
                System.out.println(i+2);
            }
        };
        System.out.println(i+3);
        t2.start();
        System.out.println(i+4);
        return t2;
    }
    public static void main(String[] args){
        createThread(10, createThread(20, Thread.currentThread()));
    }
}